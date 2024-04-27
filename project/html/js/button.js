var count = 0;
document.getElementById("myButton").onclick = function() {
    count++;
    if (count % 2 == 0) {
        document.getElementById("demo").innerHTML = "";
    } else {
        var img = document.createElement("img");
        img.src = "https://static1.srcdn.com/wordpress/wp-content/uploads/2020/04/Eye-Of-Sauron-Feature-Image.jpg";
        document.getElementById("demo").appendChild(img);
    }
}