const prevBtns = document.querySelectorAll(".btn-prevs");
const nextBtns = document.querySelectorAll(".btn-nexts");
const progress = document.getElementById("progresss");
const formSteps = document.querySelectorAll(".form-steps");
const progressSteps = document.querySelectorAll(".progress-steps");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        formStepsNum++;
        updateFormSteps();
        updateProgressbar();
    });
});

prevBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        formStepsNum--;
        updateFormSteps();
        updateProgressbar();
    });
});

function updateFormSteps() {
    formSteps.forEach((formStep) => {
        formStep.classList.contains("form-step-actives") &&
        formStep.classList.remove("form-step-actives");
    });

    formSteps[formStepsNum].classList.add("form-step-actives");
}

function updateProgressbar() {
    progressSteps.forEach((progressStep, idx) => {
        if (idx < formStepsNum + 1) {
            progressStep.classList.add("progress-step-actives");
        } else {
            progressStep.classList.remove("progress-step-actives");
        }
    });

    const progressActive = document.querySelectorAll(".progress-step-actives");

    progress.style.width =
        ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}

