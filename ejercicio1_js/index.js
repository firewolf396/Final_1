document.getElementById("studentForm").addEventListener("submit", function(event) {
    event.preventDefault();


    const code = document.getElementById("code").value;
    const name = document.getElementById("name").value;
    const first20 = parseFloat(document.getElementById("first20").value);
    const second20 = parseFloat(document.getElementById("second20").value);
    const third20 = parseFloat(document.getElementById("third20").value);
    const final40 = parseFloat(document.getElementById("final40").value);


    if ([first20, second20, third20, final40].some(score => score < 0 || score > 5)) {
        alert("Todas las notas deben estar entre 0 y 5.");
        return;
    }

    const definitive = (first20 * 0.2) + (second20 * 0.2) + (third20 * 0.2) + (final40 * 0.4);

    const status = definitive >= 3 ? "Si aprueba" : "No aprueba";
    const statusClass = definitive >= 3 ? "aprueba" : "no-aprueba";

    const table = document.getElementById("studentTable").querySelector("tbody");
    const row = document.createElement("tr");
    row.innerHTML = `
        <td>${code}</td>
        <td>${name}</td>
        <td>${first20.toFixed(1)}</td>
        <td>${second20.toFixed(1)}</td>
        <td>${third20.toFixed(1)}</td>
        <td>${final40.toFixed(1)}</td>
        <td>${definitive.toFixed(1)}</td>
        <td class="${statusClass}">${status}</td>
    `;

    table.appendChild(row);

    document.getElementById("studentForm").reset();
});
