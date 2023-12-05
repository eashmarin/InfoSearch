from models import University, Student

from flask_wtf import FlaskForm
from wtforms import StringField, IntegerField, SubmitField, DateField, SelectField
from wtforms.validators import DataRequired, Email

class StudentForm(FlaskForm):
    full_name = StringField('Имя', validators=[DataRequired()])
    birth_date = DateField('Дата рождения', validators=[DataRequired()])
    university = SelectField('Университет', coerce=int, validators=[DataRequired()])
    enrollment_year = IntegerField('Год поступления', validators=[DataRequired()])

    def __init__(self, *args, **kwargs):
        super(StudentForm, self).__init__(*args, **kwargs)
        self.university.choices = [(uni.id, uni.full_name) for uni in University.query.all()]

class UniversityForm(FlaskForm):
    full_name = StringField('Полное название', validators=[DataRequired()])
    short_name = StringField('Сокращенное название', validators=[DataRequired()])
    created_date = DateField('Дата создания', validators=[DataRequired()])
