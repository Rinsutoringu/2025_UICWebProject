/**
 * Use php to loadHTML from file
 * @param {*} fileName The file name to load
 * @param {*} targetId The target id to load the file into
 */

function loadHTML(fileName, targetId) {
    const xhr = new XMLHttpRequest();
    console.log("Preparing to load file:", fileName); // 调试信息
    xhr.open("GET", `../php/setpage.php?file=${fileName}`, true);
    xhr.onload = function () {
        console.log("Request completed with status:", xhr.status); // 调试信息
        if (xhr.status === 200) {
            document.getElementById(targetId).innerHTML = xhr.responseText;
            console.log("Content loaded successfully into:", targetId); // 调试信息
        } else {
            console.error("Failed to load file:", xhr.status);
        }
    };
    xhr.onerror = function () {
        console.error("Network error occurred while loading file:", fileName);
    };
    xhr.send();
}

function doubleLoad(filename1, filename2, targetId1, targetId2) {
    loadHTML("doubleframe.html", "maintablebody");
    loadHTML(filename1, targetId1);
    loadHTML(filename2, targetId2);
    console.log("Double load completed for:", filename1, filename2); // 调试信息
}

// When webpage load success, this function will be called.
window.onload = function () {
    loadHTML("hometown.html", "maintablebody");
}