from flask import render_template, request, redirect, url_for
from app import app, db
from models import Student, University, User
from forms import StudentForm, UniversityForm
from flask_login import login_user, login_required, logout_user

@app.route('/')
def home():
    return render_template('home.html')

@app.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']

        user = User(username=username, password=password)

        db.session.add(user)
        db.session.commit()

        return redirect(url_for('login'))
    
    return render_template('register.html')

@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']

        user = User.query.filter_by(username=username).first()

        if user and user.password == password:
            login_user(user)
            return redirect(url_for('home'))
        
    return render_template('login.html')

@app.route('/logout')
@login_required
def logout():
    logout_user()
    return redirect(url_for('home'))

@app.route('/university_list')
def university_list():
    universities = University.query.all()
    return render_template('university_list.html', universities=universities)

@app.route('/university/<int:pk>')
def university_detail(pk):
    university = University.query.get_or_404(pk)
    return render_template('university_detail.html', university=university)

@app.route('/university/create', methods=['GET', 'POST'])
@login_required
def university_create():
    form = UniversityForm()

    if form.validate_on_submit():
        university = University(full_name=form.full_name.data, short_name=form.short_name.data, created_date=form.created_date.data)
        db.session.add(university)
        db.session.commit()
        return redirect(url_for('university_list'))
    
    return render_template('university_create_update.html', form=form)

@app.route('/university/<int:pk>/update', methods=['GET', 'POST'])
@login_required
def university_update(pk):
    university = University.query.get_or_404(pk)
    form = UniversityForm(obj=university)

    if form.validate_on_submit():
        form.populate_obj(university)
        db.session.commit()
        return redirect(url_for('university_list'))
    
    return render_template('university_create_update.html', form=form)

@app.route('/university/<int:pk>/delete', methods=['GET', 'POST'])
def university_delete(pk):
    university = University.query.get_or_404(pk)

    if request.method == 'POST':
        db.session.delete(university)
        db.session.commit()
        return redirect(url_for('university_list'))
    
    return render_template('university_delete.html', university=university)


@app.route('/students')
def student_list():
    students = Student.query.all()
    return render_template('student_list.html', students=students)

@app.route('/students/<int:pk>')
def student_detail(pk):
    student = Student.query.get_or_404(pk)
    if not student:
        return 'Студент не найден', 404
    return render_template('student_detail.html', student=student)

@app.route('/student/create', methods=['GET', 'POST'])
@login_required
def student_create():
    form = StudentForm()
    if form.validate_on_submit():
        full_name = form.full_name.data
        birth_date = form.birth_date.data
        university = form.university.data
        enrollment_year = form.enrollment_year.data

        new_student = Student(full_name=full_name, birth_date=birth_date, university_id=university, enrollment_year=enrollment_year)

        db.session.add(new_student)
        db.session.commit()

        return redirect(url_for('student_list'))
    
    return render_template('student_create_update.html', form=form)

@app.route('/student/<int:pk>/update', methods=['GET', 'POST'])
@login_required
def student_update(pk):
    student = Student.query.get_or_404(pk)
    form = StudentForm(obj=student)

    if form.validate_on_submit():
        student.full_name = form.full_name.data
        student.birth_date = form.birth_date.data
        student.university_id = form.university.data
        student.enrollment_year = form.enrollment_year.data
        
        db.session.commit()
        return redirect(url_for('student_list'))
    
    return render_template('student_create_update.html', form=form)


@app.route('/student/<int:pk>/delete', methods=['GET', 'POST'])
def student_delete(pk):
    student = Student.query.get_or_404(pk)

    if student:
        db.session.delete(student)
        db.session.commit()
        return redirect(url_for('student_list'))
    else:
        return 'Студент не найден', 404
