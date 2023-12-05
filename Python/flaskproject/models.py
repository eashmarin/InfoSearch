from app import db
from flask_login import UserMixin

class University(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    full_name = db.Column(db.String(50))
    short_name = db.Column(db.String(20))
    created_date = db.Column(db.Date)

class Student(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    full_name = db.Column(db.String(50))
    birth_date = db.Column(db.Date)
    university_id = db.Column(db.Integer, db.ForeignKey('university.id'))
    university = db.relationship('University', backref=db.backref('students', lazy=True))
    enrollment_year = db.Column(db.Integer)


class User(db.Model, UserMixin):
    id = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(30), unique=True, nullable=False)
    password = db.Column(db.String(128), nullable=False)
