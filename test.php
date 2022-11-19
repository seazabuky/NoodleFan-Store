<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1471/1471262.png" />
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/9.13.0/firebase-app.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <title>Test</title>
</head>

<body>
    <h2>Select an image</h2>
    <input type="file" name='image' multiple id='fileInput' />
    <!-- Div rehnders local image from fileList -->
    <div id='grid' style='border: 3px solid red; width: 300px; height: 300px; margin: 100px auto;'></div>

    <h3>Canvas Resize</h3>
    <!-- Canvas resizes local image and allows for download -->
    <canvas id='imgResize'></canvas>

    <a id="download" download="resized.png"><button type="button" onClick="Download()">Download Resized Image</button></a>

    <script>
        let img = new Image()

        const canvas = document.getElementById('imgResize')
        let ctx = canvas.getContext("2d");

        


        canvas.width = 2048;
        canvas.height = 2048;

        //Adds to div bg
        const addLocalPlaceholder = (e) => {
            let file = e.target.files
            console.log(file)

            let reader = new FileReader();

            reader.onload = (function(e) {
                console.log('loaded')
                document.getElementById('grid').style.backgroundImage = "url(" + e.target.result + ")";

                img.src = e.target.result
                //img.src = reader.result;
            })
            reader.readAsDataURL(file[0])

            // get image size and set canvas size to image size  * 1.5
            img.onload = function() {
                canvas.width = img.width * 0.75;
                canvas.height = img.height * 0.75;
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
            }

            //img = e.target.result;
        }

        document.getElementById('fileInput')
            .addEventListener('change', addLocalPlaceholder, false)

        //////////////////Download Logic


        const Download = () => {
            const download = document.getElementById("download");
            let image = document.getElementById("imgResize").toDataURL("image/png")
                .replace("image/png", "image/octet-stream");

            download.setAttribute("href", image);
        }
    </script>
</body>

</html>