# Generated by Django 4.2.7 on 2023-11-28 12:30

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='University',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('full_name', models.CharField(max_length=50)),
                ('short_name', models.CharField(max_length=20)),
                ('creation_date', models.DateField()),
            ],
        ),
        migrations.CreateModel(
            name='Student',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('full_name', models.CharField(max_length=50)),
                ('birth_date', models.DateField()),
                ('enrollment_year', models.IntegerField()),
                ('university', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='myapp.university')),
            ],
        ),
    ]
