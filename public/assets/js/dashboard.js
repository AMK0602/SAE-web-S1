
function generateChart(canvasId, allOptions, rawData, chartType, question) {
    // Récupère l'élément canvas et son parent
    const canvas = document.getElementById(canvasId);
    if (!canvas) {
        console.error(`Canvas avec l'id "${canvasId}" introuvable.`);
        return;
    }
    const parentDiv = canvas.parentElement;

    // Vérifie et crée le titre de la question
    let questionElement = parentDiv.querySelector(".chart-question");
    if (!questionElement) {
        questionElement = document.createElement("h3");
        questionElement.className = "chart-question";
        parentDiv.insertBefore(questionElement, canvas);
    }
    questionElement.textContent = question;

    // Prépare les données pour le graphique
    const mergedData = allOptions.map((option) => {
        const match = rawData.find((data) => data.reponse === option.option_text);
        return {
            reponse: option.option_text,
            count: match ? match.count : 0, // Met 0 si aucune correspondance
        };
    });

    const labels = mergedData.map((item) => item.reponse);
    const data = mergedData.map((item) => item.count);

    // Vérifie que les données sont valides
    if (labels.length === 0 || data.length === 0) {
        console.error("Aucune donnée valide pour le graphique.");
        return;
    }

    // Configure le graphique
    const ctx = canvas.getContext("2d");
    new Chart(ctx, {
        type: chartType,
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Nombre de réponses",
                    data: data,
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56",
                        "#4BC0C0",
                        "#9966FF",
                        "#FF9F40",
                        "#E7E9ED",
                    ],
                    borderColor: "#ccc",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: chartType !== "bar",
                    position: "top",
                },
                tooltip: {
                    callbacks: {
                        label: (context) => `${context.label}: ${context.raw}`,
                    },
                },
            },
            scales: chartType === "bar" ? {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: "Nombre de réponses",
                    },
                },
                x: {
                    title: {
                        display: true,
                        text: "Catégories",
                    },
                },
            } : {},
        },
    });
}


const dataAge = [
    { reponse: "18-25", count: 10 },
    { reponse: "26-35", count: 20 },
    { reponse: "36-45", count: 5 }
];
const optionsAge = [
    { option_text: "18-25" },
    { option_text: "26-35" },
    { option_text: "36-45" }
];

generateChart("myChart", optionsAge, dataAge, "bar", "Quel votre age ?");




