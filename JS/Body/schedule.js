document.addEventListener("DOMContentLoaded", function () {
  // Fetch schedule times from the database
  fetch("fetch_schedules.php")
    .then((response) => response.json())
    .then((data) => {
      const scheduleTimeSelect = document.getElementById("schedule_time");
      data.forEach((schedule) => {
        const option = document.createElement("option");
        option.value = schedule.id;
        option.textContent = schedule.time_slot;
        scheduleTimeSelect.appendChild(option);
      });
    });

  // Fetch instructors based on gender selection
  const genderSelect = document.getElementById("gender");
  genderSelect.addEventListener("change", fetchInstructors);

  function fetchInstructors() {
    const gender = genderSelect.value;
    fetch(`fetch_instructors.php?gender=${gender}`)
      .then((response) => response.json())
      .then((data) => {
        const instructorSelect = document.getElementById("instructor");
        instructorSelect.innerHTML = ""; // Clear previous options
        data.forEach((instructor) => {
          const option = document.createElement("option");
          option.value = instructor.id;
          option.textContent = instructor.name;
          instructorSelect.appendChild(option);
        });
      });
  }

  // Clear form fields
  document.getElementById("clearBtn").addEventListener("click", function () {
    document.getElementById("bookingForm").reset();
  });
});
