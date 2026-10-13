// تهيئة عناصر العداد الدائري
const canvas = document.getElementById('circularLoader');
const ctx = canvas.getContext('2d');
let al = 0;
const start = 4.72;
const cw = canvas.width;
const ch = canvas.height;
let diff;
let sim;

function progressSim(){
    diff = ((al / 100) * Math.PI * 2 * 10).toFixed(2);
    ctx.clearRect(0, 0, cw, ch);
    ctx.lineWidth = 17;
    ctx.fillStyle = '#0d6efd';
    ctx.strokeStyle = "#0d6efd";
    ctx.textAlign = "center";
    ctx.font = "28px monospace";
    ctx.fillText(al + '%', cw * 0.52, ch * 0.5 + 5, cw + 12);
    ctx.beginPath();
    ctx.arc(100, 100, 75, start, diff / 10 + start, false);
    ctx.stroke();

    if (al >= 100) {
        clearTimeout(sim);
        // تنفيذ الإجراءات عند اكتمال التحميل
        myModal.show();
        loader.style.display = 'none';
    }

    al++;
}

// التحكم في زر القرعة والنافذة المنبثقة
const win = document.querySelector("#winner");
const loader = document.querySelector(".loader-con");

const myModal = new bootstrap.Modal(document.getElementById('modal'), {
    keyboard: false
});

if (win) {
    win.addEventListener('click', function() {
        loader.style.display = 'block';
        al = 0; // إعادة ضبط العداد للبدء من جديد
        sim = setInterval(progressSim, 20);
    });
}