/**
 * Use php to loadHTML from file
 * @param {*} fileName The file name to load
 * @param {*} targetId The target id to load the file into
 */

function loadHTML(fileName, targetId) {
    const xhr = new XMLHttpRequest();
    console.log("Preparing to load file:", fileName);
    xhr.open("GET", `../php/setpage.php?file=${fileName}`, true);
    xhr.onload = function () {

        // DEBUG
        console.log("服务器返回状态", xhr.status); // 调试信息

        // console.log("Request completed with status:", xhr.status);
        if (xhr.status === 200) {
            document.getElementById(targetId).innerHTML = xhr.responseText;
            
            // DEBUG
            console.log("内容成功载入至 ", targetId);

            // console.log("Content loaded successfully into:", targetId);
        } else {

            // DEBUG
            console.error("文加载失败", xhr.status);

            // console.error("Failed to load file:", xhr.status);
        }
    };
    xhr.onerror = function () {
        // DEBUG
        console.error("网络错误", fileName);

        // console.error("Network error occurred while loading file:", fileName);
    };
    xhr.send();
}

function doubleLoad(filename1, filename2, targetId1, targetId2) {
    loadHTML("doubleframe.html", "maintablebody");
    loadHTML(filename1, targetId1);
    loadHTML(filename2, targetId2);
    // DEBUG
    console.log("双组件载入函数初始化完成", filename1, filename2);
    
    // console.log("Double load completed for:", filename1, filename2);
}

// When webpage load success, this function will be called.

let isLoaded = false;

window.onload = function () {
    if (!isLoaded) {
        loadHTML("hometown.html", "maintablebody");
    }
    
}

function showSelectedHometown() {
    const selectedHometown = document.getElementById("hometown").value;
    const displayInput = document.getElementById("showselect-hometown");

    switch (selectedHometown) {
        case "default":
            
            displayInput.value = "No hometown selected";
            break;

        case "hometown1":
            loadHTML("towns/fuan.html", "showhometown");
            displayInput.value = "HomeTown 1";
            break;

        case "hometown2":
            loadHTML("towns/guangzhou.html", "showhometown");
            displayInput.value = "HomeTown 2";
            break;

        case "hometown3":
            loadHTML("towns/shenyang.html", "showhometown");
            displayInput.value = "HomeTown 3";
            break;

        case "hometown4":
            loadHTML("towns/zhuhai.html", "showhometown");
            displayInput.value = "HomeTown 4";
            break;

        default:
            displayInput.value = "Invalid selection";

            // DEBUG
            console.log("你选择了： " + selectedHometown);

            // console.log("You chose: " + selectedHometown);
            break;
    }
}