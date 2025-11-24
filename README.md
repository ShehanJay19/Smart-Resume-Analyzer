# 🚀 Smart Resume Analyzer  
A machine-learning powered web application that analyzes resumes, extracts text, and predicts the most relevant job category for a candidate.  
Built using **Flask (Python)** for NLP/ML processing and **Laravel (PHP)** for the frontend interface.

---

## 📌 Features
- 📄 Upload PDF/DOCX resumes  
- 🤖 NLP-based text extraction  
- 🧠 Machine Learning classification  
- 🎯 Predicts job category (e.g., Data Science, Web Developer, Software Engineer…)  
- 🔗 Laravel frontend with clean UI  
- ⚙️ Flask backend API for ML inference  
- 💾 Model trained using TF-IDF + Logistic Regression  
- 🔍 Displays extracted text and predicted category  

---

## 🏗️ Project Architecture

```
smart-resume-analyzer/
│── backend/ (Flask + ML)
│   │── app.py
│   │── train.py
│   │── model/
│   │── uploads/
│   └── requirements.txt
│
└── frontend/ (Laravel)
    │── routes/web.php
    │── app/Http/Controllers/ResumeController.php
    └── resources/views/
```

---

## ⚙️ Installation & Setup

### 🔥 Backend Setup (Flask + ML)

1. Navigate to backend:
```bash
cd backend
```

2. Install dependencies:
```bash
pip install -r requirements.txt
```

3. Download NLTK data:
```python
import nltk
nltk.download('punkt')
nltk.download('stopwords')
```

4. Train the model:
```bash
python train.py
```

5. Start the Flask server:
```bash
python app.py
```

Backend runs at:
```
http://127.0.0.1:5000/analyze
```

---

### 🎨 Frontend Setup (Laravel)

1. Navigate to frontend:
```bash
cd frontend
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Serve Laravel:
```bash
php artisan serve
```

Frontend runs at:
```
http://127.0.0.1:8000
```

---

## 🧠 Machine Learning Model
- **Vectorizer:** TF-IDF (NLP)
- **Classifier:** Logistic Regression
- **Training Input:** Resume text dataset
- Supports multiple job categories (customizable)

---

## 📤 API Endpoint (Flask)

### POST `/analyze`
**Body (form-data):**
```
resume: <file>
```

**Response:**
```json
{
  "resume_text": "Extracted resume content...",
  "category": "Software Engineer"
}
```

---

## 🖼️ Screenshots (optional)
You can add UI screenshots here.

---

## 🤝 Contributing
Pull requests are welcome! For major changes, please open an issue first.

---

## 📜 License
This project is licensed under the MIT License.

---

## ⭐ Support
If you like this project, give it a ⭐ on GitHub to support development!
