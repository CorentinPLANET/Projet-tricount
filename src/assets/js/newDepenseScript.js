const amount_input = document.getElementById("amount-input");
const contributors = document.getElementsByClassName("contributor-amount");

amount_input.addEventListener("change", () => {

    let total = parseFloat(amount_input.value)
    let contribution = total / contributors.length

    for (const contributor of contributors) {
        contributor.value = contribution.toFixed(2)
    }
})