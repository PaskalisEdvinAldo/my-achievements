const dropArea = document.querySelector('.drop-section');
const listSection = document.querySelector('.list-section');
const listContainer = document.querySelector('.list');
const fileSelector = document.querySelector('.file-selector');
const fileSelectorInput = document.querySelector('.file-selector-input');

// upload files with browse button
fileSelector.onclick = function(){
    fileSelectorInput.click();
};

fileSelectorInput.onchange = function() {
    Array.from(fileSelectorInput.files).forEach((file) => {
        if(typeValidation(file.type)){
            uploadFile(file);
        } else {
            console.error('Unsupported file type:', file.type);
        }
    });
};

// when file is over the drag area
// when file is over the drag area
dropArea.ondragover = function(e) {
    e.preventDefault();
    dropArea.classList.add('drag-over-effect');
};
// when file leave the drag area
dropArea.ondragleave = function() {
    dropArea.classList.remove('drag-over-effect');
};

// when file drop on the drag area
dropArea.ondrop = function(e) {
    e.preventDefault();
    dropArea.classList.remove('drag-over-effect');

    const files = e.dataTransfer.files;

    if (files.length > 0) {
        // Iterate over the files array
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (typeValidation(file.type)) {
                uploadFile(file);
            } else {
                console.error('Unsupported file type:', file.type);
            }
        }
    }
    // Clear the input files to allow dropping the same file again
    fileSelectorInput.value = '';
};


// check the file type
function typeValidation(type){
    const splitType = type.split('/')[0];
    return type === 'application/pdf' || splitType === 'image';
}

// Function to upload file
function uploadFile(file) {
    listSection.style.display = 'block';
    const li = document.createElement('li');
    li.classList.add('in-prog');
    li.innerHTML = `
        <div class="col">
            <img src="icons/${iconSelector(file.type)}" alt="">
        </div>
        <div class="col">
            <div class="file-name">
                <div class="name">${file.name}</div>
                <span>0%</span>
            </div>
            <div class="file-progress">
                <span></span>
            </div>
            <div class="file-size">${(file.size/(1024*1024)).toFixed(2)} MB</div>
        </div>
        <div class="col">
            <svg xmlns="http://www.w3.org/2000/svg" class="cross" height="20" width="20"><path d="m5.979 14.917-.854-.896 4-4.021-4-4.062.854-.896 4.042 4.062 4-4.062.854.896-4 4.062 4 4.021-.854.896-4-4.063Z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="tick" height="20" width="20"><path d="m8.229 14.438-3.896-3.917 1.438-1.438 2.458 2.459 6-6L15.667 7Z"/></svg>
        </div>
    `;
    listContainer.prepend(li);

    let formData = new FormData();
    formData.append('file', file);

    fetch('/certificate', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Failed to upload file.');
        }
        return response.json(); // assuming server returns JSON response
    })
    .then(data => {
        // handle successful response here if needed
        li.classList.add('complete');
        li.classList.remove('in-prog');
    })
    .catch(error => {
        console.error('Error occurred during the request:', error.message);
        li.remove();
    });

    li.querySelector('.cross').onclick = function(){
        li.remove();
    };
}


// find icon for file
function iconSelector(type){
    const splitType = (type.split('/')[0] == 'application') ? type.split('/')[1] : type.split('/')[0];
    return splitType + '.png'
}