from django.db import models

# Create your models here.
class University(models.Model):
    full_name = models.CharField(max_length=50)
    short_name = models.CharField(max_length=20)
    creation_date = models.DateField()

    def __str__(self):
        return self.full_name

class Student(models.Model):
    full_name = models.CharField(max_length=50)
    birth_date = models.DateField()
    university = models.ForeignKey(University, on_delete=models.CASCADE)
    enrollment_year = models.IntegerField()

    def __str__(self):
        return self.full_name