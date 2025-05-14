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
            console.error("文件加载失败", xhr.status);

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

function registerNewMember(event) {
    // Prevent the default form submission
    event.preventDefault();

    const regusr = document.getElementById("regusr").value;
    const regpwd = document.getElementById("regpwd").value;
    const reregpwd = document.getElementById("reregpwd").value;
    if (!regusr || !regpwd || !reregpwd) {
        alert("Please fill in all fields.");
        return false;
    }
    if (regpwd !== reregpwd) {
        alert("Passwords do not match.");
        return false;
    }
    event.target.submit(); 
    return true;
}

// basic $_SESSION['logged_in'] to check if user is logged in
// if logged in, show the button
document.addEventListener("DOMContentLoaded", () => {
    fetch("../php/checklogin.php")
        .then(response => response.json()) 
        .then(data => {
            if (data.logged_in) {
                const dynamicButton = document.getElementById("dynamic-button");
                if (dynamicButton) {
                    dynamicButton.innerHTML = `<button id="subscribe" onclick="subscribe()">subscribe this!</button>`;
                } else {
                    console.error("Element with id 'dynamic-button' not found.");
                }
            }
        })
        .catch(error => {
            console.error("Error fetching login status:", error);
        });
});

function loginMember(event) {
    // Prevent the default form submission
    event.preventDefault();

    const usr = document.getElementById("usr").value;
    const pwd = document.getElementById("pwd").value;
    if (!usr || !pwd) {
        alert("Please fill in all fields.");
        return false;
    }
    event.target.submit(); 
    return true;
}

function subscribe() {
    // TODO
    userchoice = document.getElementById("hometown").value;
    if (userchoice === "default") {
        alert("Please select a hometown first.");
        return;
    }
    fetch("../php/subscribe.php", {
        // post method
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            hometown: userchoice
        })
    })
    // response a json, key:"success" value:true/false
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Subscription successful!");
        } else {
            alert("Subscription failed.");
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("An error occurred. Please try again.");
    });
}

function showlogin() {
    fetch("../php/checklogin.php")
        .then(response => response.json())
        .then(data => {
            console.log("Login status:", data); // 调试日志
            if (data.logged_in) {
                doubleLoad('alreadylogin.html', 'alreadylogin.html', 'leftview', 'rightview');
            } else {
                doubleLoad('login.html', 'register.html', 'leftview', 'rightview');
            }
        })
        .catch(error => {
            console.error("Error fetching login status:", error); // 捕获错误
        });
}

function logout() {
    fetch("../php/logout.php")
}