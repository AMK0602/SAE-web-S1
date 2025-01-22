document.addEventListener("DOMContentLoaded", () => {
    fetch('../../assets/php/getStats.php')
        .then(response => {
            console.log("HTTP Response:", response);
            return response.text();
        })
        .then(text => {
            console.log("Raw Response Text:", text);
            const data = JSON.parse(text);
            generateCharts(data);
        })
        .catch(error => {
            console.error("Erreur réseau ou serveur :", error);
            document.getElementById("charts").innerHTML = "<p>Impossible de charger les statistiques.</p>";
        });
});

function generateCharts(data) {
    // 1. Répartition des régions
    const regionCounts = d3.rollup(data, v => v.length, d => d.region_id);
    createBarChart([...regionCounts], "Répartition des Régions", "charts");

    // 2. Situation de logement
    const logementCounts = d3.rollup(data, v => v.length, d => d.housing_id);
    createBarChart([...logementCounts], "Répartition des Logements", "charts");

    // 3. Orientation CDAPH
    const cdaphCounts = d3.rollup(data, v => v.length, d => d.cdaph);
    createPieChart([...cdaphCounts], "Orientation CDAPH", "charts");

    // 4. Satisfaction du lieu de vie
    const satisfactionCounts = d3.rollup(data, v => v.length, d => d.lifesatisfaction_id);
    createPieChart([...satisfactionCounts], "Satisfaction Lieu de Vie", "charts");

    // 5. Qualité de vie
    const qualiteCounts = d3.rollup(data, v => v.length, d => d.lifequality_id);
    createBarChart([...qualiteCounts], "Qualité de Vie", "charts");

    // 6. Activité Exercée
    const activityCounts = d3.rollup(data, v => v.length, d => d.activity_id);
    createBarChart([...activityCounts], "Activités exercées", "charts");

    // 7. Besoin de Soutien
    const supportCounts = d3.rollup(data, v => v.length, d => d.lifequality_id);
    createBarChart([...supportCounts], "Besoin de Soutien", "charts");
}

function createBarChart(data, title, containerId) {

    const svg = d3.select(`#${containerId}`).append("div")
        .append("svg")
        .attr("viewBox", "0 0 400 300");

    const margin = { top: 20, right: 20, bottom: 50, left: 50 };
    const width = 400 - margin.left - margin.right;
    const height = 300 - margin.top - margin.bottom;

    const g = svg.append("g").attr("transform", `translate(${margin.left},${margin.top})`)

    const x = d3.scaleBand()
        .domain(data.map(d => d[0]))
        .range([0, width])
        .padding(0.2);

    const y = d3.scaleLinear()
        .domain([0, d3.max(data, d => d[1])])
        .nice()
        .range([height, 0]);
    svg.append("text")
        .attr("x", width / 2)
        .attr("y", margin.top / 2 + 10)
        .attr("text-anchor", "middle")
        .attr("font-size", "16px")
        .attr("font-weight", "bold")
        .text(title);
    g.append("g")
        .attr("transform", `translate(0,${height})`)
        .call(d3.axisBottom(x));

    g.append("g")
        .call(d3.axisLeft(y));

    g.selectAll(".bar")
        .data(data)
        .enter().append("rect")
        .attr("class", "bar")
        .attr("x", d => x(d[0]))
        .attr("y", d => y(d[1]))
        .attr("width", x.bandwidth())
        .attr("height", d => height - y(d[1]))
        .attr("fill", "#69b3a2");
}

function createPieChart(data, title, containerId) {
    const svg = d3.select(`#${containerId}`).append("div")
        .append("svg")
        .attr("viewBox", "0 0 400 300");

    const radius = Math.min(400, 300) / 2 - 40;
    const g = svg.append("g")
        .attr("transform", "translate(200,150)");

    const color = d3.scaleOrdinal()
        .domain(data.map(d => d[0]))
        .range(d3.schemeCategory10);

    const pie = d3.pie().value(d => d[1]);
    const arc = d3.arc().innerRadius(0).outerRadius(radius);

    svg.append("text")
        .attr("x", 200)
        .attr("y", 20)
        .attr("text-anchor", "middle")
        .attr("font-size", "16px")
        .attr("font-weight", "bold")
        .text(title);

    g.selectAll("path")
        .data(pie(data))
        .enter().append("path")
        .attr("d", arc)
        .attr("fill", d => color(d.data[0]));

    g.selectAll("text")
        .data(pie(data))
        .enter().append("text")
        .text(d => `${d.data[0]} (${d.data[1]})`)
        .attr("transform", d => `translate(${arc.centroid(d)})`)
        .style("text-anchor", "middle")
        .style("font-size", "12px");
}
