
document.addEventListener("DOMContentLoaded", function () {

  const questions = document.querySelectorAll(".faq-question");

  questions.forEach(q => {
    q.addEventListener("click", function () {
      const item = this.parentElement;
      const answer = item.querySelector(".faq-answer");

      // close others (optional)
      document.querySelectorAll(".faq-item").forEach(i => {
        if (i !== item) {
          i.classList.remove("active");
          i.querySelector(".faq-answer").style.display = "none";
        }
      });

      item.classList.toggle("active");

      answer.style.display =
        answer.style.display === "block" ? "none" : "block";
    });
  });

});