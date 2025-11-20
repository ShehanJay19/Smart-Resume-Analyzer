Smart Resume Analyzer

Smart Resume Analyzer is a full-stack resume analysis system built using Laravel and a Flask-based machine learning microservice.
The system extracts text from resumes (PDF/DOCX), detects name, email, skills, and generates a resume score using NLP.
All analyzed data is stored in a MySQL database and displayed through a Laravel dashboard.

Features
Machine Learning (Flask)

Extract text from PDF and DOCX files

Detect candidate name

Extract email using regex

Skill detection using NLP

Resume scoring system

JSON API response



Laravel (Frontend)

Resume upload form

Sends file to Flask API

Stores analysis results in database

Displays analyzed resumes in a dashboard


Tech Stack

Frontend & Backend:

Laravel 11

Blade Templates

MySQL



ML Microservice:

Python

Flask

pdfplumber

python-docx

scikit-learn

nltk


Project Architecture


Laravel (Frontend + API Consumer)
 ├── Upload resume
 ├── Store results in database
 └── Sends file to Flask ML API

Flask ML Service
 ├── Extract resume text
 ├── Detect name, email, skills
 ├── Score resume
 └── Returns JSON to Laravel




