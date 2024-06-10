const form = document.querySelector("#upload-form");
const fileInput = document.querySelector("#file-input");

form.addEventListener("submit", (event) => {
  event.preventDefault();

  const files = fileInput.files;
  const formData = new FormData();

  // Add all selected files to the form data
  for (let i = 0; i < files.length; i++) {
    formData.append("files", files[i]);
  }

  // Send the form data to the server using an AJAX request
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "/upload");
  xhr.onload = () => {
    if (xhr.status === 200) {
      console.log("Upload successful");
    } else {
      console.log("Upload failed");
    }
  };
  xhr.send(formData);
});
