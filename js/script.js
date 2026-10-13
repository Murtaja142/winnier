// تاريخ نهاية العداد التنازلي
const targetDate = new Date("Sep 20, 2026 18:30:00").getTime();
const countdownElem = document.querySelector("#countdown");

if (countdownElem) {
    const timerInterval = setInterval(() => {
        const now = new Date().getTime();
        const distance = targetDate - now;

        if (distance <= 0) {
            clearInterval(timerInterval);
            countdownElem.innerHTML = "انتهت فترة التسجيل في السحب!";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        countdownElem.innerHTML = `${days} يوم ، ${hours} ساعة ، ${minutes} دقيقة ، ${seconds} ثانية`;
    }, 1000);
}

// دالة إطلاق مؤثرات الاحتفال
function celebrateWinner() {
    if (typeof confetti === 'function') {
        confetti({
            particleCount: 200,
            spread: 100,
            origin: { y: 0.6 }
        });
    }
}

const winnerBtn = document.getElementById("winner");
if (winnerBtn) {
    winnerBtn.addEventListener("click", celebrateWinner);
}