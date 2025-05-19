/**
 * Use php to loadHTML from file
 * @param {*} fileName The file name to load
 * @param {*} targetId The target id to load the file into
 */

function loadHTML(fileName, targetId) {
    const xhr = new XMLHttpRequest();
    console.log("Preparing to load file:", fileName);
    xhr.open("GET", `php/setpage.php?file=${fileName}`, true);
    console.log("Loading:", fileName, "into", targetId);
    xhr.onload = function () {if (xhr.status === 200) document.getElementById(targetId).innerHTML = xhr.responseText;};
    xhr.send();
}

function doubleLoad(filename1, filename2, targetId1, targetId2) {
    loadHTML("doubleframe.html", "maintablebody");
    loadHTML(filename1, targetId1);
    loadHTML(filename2, targetId2);
}

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
            loadHTML("towns/zhuhai.html", "showhometown");
            displayInput.value = "Zhuhai";
            break;

        case "hometown2":
            loadHTML("towns/shenzhen.html", "showhometown");
            displayInput.value = "Shenzhen";
            break;

        case "hometown3":
            loadHTML("towns/shenyang.html", "showhometown");
            displayInput.value = "Shenyang";
            break;

        case "hometown4":
            loadHTML("towns/guangzhou.html", "showhometown");
            displayInput.value = "Guangzhou";
            break;

        case "hometown5":
            loadHTML("towns/hefei.html", "showhometown");
            displayInput.value = "Hefei";
            break;
        
        case "hometown6":
            loadHTML("towns/weifang.html", "showhometown");
            displayInput.value = "Weifang";
            break;

        default:
            displayInput.value = "Invalid selection";
            break;
    }
}

function registerNewMember(event) {
    // Prevent the default form submission
    event.preventDefault();

    const regusr = document.getElementById("regusr").value;
    const regpwd = document.getElementById("regpwd").value;
    const reregpwd = document.getElementById("reregpwd").value;
    const realname = document.getElementById("realname").value;
    if (!regusr || !regpwd || !reregpwd || !realname) {
        alert("Please fill in all fields.");
        return false;
    }
    if (regpwd !== reregpwd) {
        alert("Passwords do not match.");
        return false;
    }
    // if realname is digit, return false
    if (/^\d+$/.test(realname)) {
        alert("Real name cannot be a digit.");
        return false;
    }
    event.target.submit(); 
    return true;
}

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
    fetch("php/subscribe.php", {
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
    fetch("php/checklogin.php")
        .then(response => response.json())
        .then(data => {
            console.log("Login status:", data);
            if (data.logged_in) {
                doubleLoad('alreadylogin.html', 'alreadylogin.html', 'leftview', 'rightview');
            } else {
                doubleLoad('login.html', 'register.html', 'leftview', 'rightview');
            }
        })
        .catch(error => {
            console.error("Error fetching login status:", error);
        });
}

function logout() {
    fetch("php/logout.php")
}

function showhometown() {
    
    loadHTML('hometown.html', 'maintablebody')
}
function showhometown() {
    fetch("php/checklogin.php")
        .then(response => response.json())
        .then(data => {
            console.log("Login status:", data);
            if (data.logged_in) {
                loadHTML('hometownlogin.html', 'maintablebody')
            } else {
                loadHTML('hometown.html', 'maintablebody')
            }
        })
        .catch(error => {
            console.error("Error fetching login status:", error);
        });
}

function jumpToIndexAndLoad() {
    window.location.href = "../index.html?load=hometownlogin.html";
}

function updateSearchAction(selectedType) {
    const form = document.getElementById('searchForm');
    
    if (selectedType === 'user') {
        form.action = 'php/searchusers.php';
    } else if (selectedType === 'city') {
        form.action = 'php/searchcities.php';
    }
}

document.addEventListener("DOMContentLoaded", function() {
    const params = new URLSearchParams(window.location.search);
    const page = params.get("load");
    if (page) {
        setTimeout(function() {
            loadHTML(page, "maintablebody");
        }, 0);
    } else {
        loadHTML("hometown.html", "maintablebody");
    }
});