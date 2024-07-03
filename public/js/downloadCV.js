let printarea = document.getElementById('printarea');
let resumebutton = document.getElementById('resumebutton');
let opt = {
    
    margin: 10,
    filename: 'resume.pdf',
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: { scale: 1 },
    jsPDF: { format: 'a4', orientation: 'portrait' }
}

function generateResume() {
    html2pdf(printarea, opt);
}

resumebutton.addEventListener('click', () => {
    generateResume();
});
