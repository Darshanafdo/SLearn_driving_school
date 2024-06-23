document.addEventListener("DOMContentLoaded", function () {
  window.fillUpdateForm = function (instructor) {
    document.querySelector("#updateFormContainer").style.display = "block";
    document.querySelector("#updateForm [name=id]").value = instructor.id;
    document.querySelector("#updateForm [name=name]").value = instructor.name;
    document.querySelector("#updateForm [name=nic]").value = instructor.nic;
    document.querySelector("#updateForm [name=gender]").value =
      instructor.gender;
    document.querySelector("#updateForm [name=phone]").value = instructor.phone;
    document.querySelector("#updateForm [name=email]").value = instructor.email;
  };

  window.hideUpdateForm = function () {
    document.querySelector("#updateFormContainer").style.display = "none";
  };
});
