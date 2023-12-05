from django.shortcuts import render, get_object_or_404, redirect
from .models import University, Student
from .forms import UniversityForm, StudentForm  # Подключите формы

# Create your views here.
def home(request):
    return render(request, 'home.html')

def university_list(request):
    universities = University.objects.all()
    return render(request, 'university_list.html', {'universities': universities})

def university_detail(request, pk):
    university = get_object_or_404(University, pk=pk)
    return render(request, 'university_detail.html', {'university': university})

def university_create(request):
    if request.method == 'POST':
        form = UniversityForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('university_list')
    else:
        form = UniversityForm()
    return render(request, 'university_create_update.html', {'form': form})

def university_update(request, pk):
    university = get_object_or_404(University, pk=pk)
    if request.method == 'POST':
        form = UniversityForm(request.POST, instance=university)
        if form.is_valid():
            form.save()
            return redirect('university_list')
    else:
        form = UniversityForm(instance=university)
    
    return render(request, 'university_create_update.html', {'form': form})

def university_delete(request, pk):
    university = get_object_or_404(University, pk=pk)
    if request.method == 'POST':
        university.delete()
        return redirect('university_list')
    return render(request, 'university_delete.html', {'university': university})


def student_list(request):
    students = Student.objects.all()
    return render(request, 'student_list.html', {'students': students})

def student_detail(request, pk):
    student = get_object_or_404(Student, pk=pk)
    return render(request, 'student_detail.html', {'student': student})

def student_create(request):
    if request.method == 'POST':
        form = StudentForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('student_list')
    else:
        form = StudentForm()
    return render(request, 'student_create_update.html', {'form': form})

def student_update(request, pk):
    student = get_object_or_404(Student, pk=pk)
    if request.method == 'POST':
        form = StudentForm(request.POST, instance=student)
        if form.is_valid():
            form.save()
            return redirect('student_list')
    else:
        form = StudentForm(instance=student)
    
    return render(request, 'student_create_update.html', {'form': form})

def student_delete(request, pk):
    student = get_object_or_404(Student, pk=pk)
    if request.method == 'POST':
        student.delete()
        return redirect('student_list')
    return render(request, 'student_delete.html', {'student': student})