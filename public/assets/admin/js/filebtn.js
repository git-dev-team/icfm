const file = document.querySelector('#file');
file.addEventListener('change', (e) => {
    // Get the selected file
    const [file] = e.target.files;
    // Get the file name and size
    const { name: fileName, size } = file;
    // Convert size in bytes to kilo bytes
    const fileSize = (size / 1000).toFixed(2);
    // Set the text content
    const fileNameAndSize = `${fileName} , ${fileSize}KB`;
    document.querySelector('.file-name').textContent = fileNameAndSize;
    document.querySelector('.icon').style.color = " green";
});

// function myFunction() {
//     const node = document.getElementById("clone");
//     const clone = node.cloneNode(true);
//     document.body.appendChild(clone);
// }