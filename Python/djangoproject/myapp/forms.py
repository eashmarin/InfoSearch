from django import forms
from .models import University, Student

class UniversityForm(forms.ModelForm):
    class Meta:
        model = University
        fields = ['full_name', 'short_name', 'creation_date']
        labels = {
            'full_name': 'Полное название',
            'short_name': 'Сокращенное название',
            'creation_date': 'Дата создания',
        }

class StudentForm(forms.ModelForm):
    class Meta:
        model = Student
        fields = ['full_name', 'birth_date', 'university', 'enrollment_year']
        labels = {
            'full_name': 'Имя',
            'birth_date': 'Дата рождения',
            'university': 'Университет',
            'enrollment_year': 'Год поступления'
        }