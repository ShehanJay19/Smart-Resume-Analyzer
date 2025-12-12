from flask import Flask, request, jsonify
import os
import tempfile

app=Flask(__name__)

def extract_text_from_pdf(uploaded_file):
    
    with tempfile.NamedTemporaryFile(delete=False) as tmp:
        uploaded_file.save(tmp.name)
        try:
            with open(tmp.name,'rb') as f:
                raw=f.read(2048)
            
            return f"Uploaded file: {uploaded_file.filename} (frist bytes snippet): {raw[:100]}" 
        finally:
            try:
                os.unlink(tmp.name)
            except Exception:
               pass
           
@app.route('/analyze', methods=['POST'])
def analyze():
    if "resume" in request.files:
        f=request.files["resume"]
        text=extract_text_from_pdf(f)
    else:
        js=request.get_json(silent=True) or {}
        text=js.get("text","") or "No text provided"
        
    response={
        "resume_text": text,
        "predicted_category": "tech",
        "scores":{
            "tech": 0.95,
            "finance": 0.03,
            "healthcare": 0.02
        },
        "quality_score": 78.5,
        "quality_breakdown": {
            "skills": 85.0,
            "experience": 65.0,
            "content_length": 70.0,
            "structure": 60.0,
            "grammar": 90.0
        }
        
    }  
    return jsonify(response)   
   
if __name__ == "__main__":
    # Run on 0.0.0.0:5000 so Laravel (on same machine) can call it at http://127.0.0.1:5000/analyze
    app.run(host="0.0.0.0", port=5000, debug=True)
                   