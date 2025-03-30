document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("scheduleForm").addEventListener("submit", function (event) {
        event.preventDefault();

        let formData = {
            interviewer_id: document.getElementById("interviewer_id").value,
            applicant_id: document.getElementById("applicant_id").value,
            date_time: document.getElementById("date_time").value,
            room_number: document.getElementById("room_number").value,
            modality: document.getElementById("modality").value,
        };

        fetch("/api/interview/create", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Authorization": "Bearer YOUR_TOKEN_HERE"
            },
            body: JSON.stringify(formData),
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById("scheduleMessage").innerText = data.message || "Interview scheduled!";
        })
        .catch(error => console.error("Error:", error));
    });
});

function fetchInterviews() {
    fetch("/api/interview/all")
    .then(response => response.json())
    .then(data => {
        let list = document.getElementById("interviewList");
        list.innerHTML = "";
        data.forEach(interview => {
            let li = document.createElement("li");
            li.textContent = `Interview ${interview.id} on ${interview.date_time}`;
            list.appendChild(li);
        });
    })
    .catch(error => console.error("Error:", error));
}
