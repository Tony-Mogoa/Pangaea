<?php
    session_start();
    if(!isset($_SESSION['userId'])){
        header("Location: login.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap"
            rel="stylesheet"
        />

        <link
            href="https://fonts.googleapis.com/css2?family=Newsreader:wght@300;400;600;700&display=swap"
            rel="stylesheet"
        />

        <link
            rel="icon"
            href="assets/img/logo.svg"
            type="image/svg"
            sizes="16x16"
        />
        <link rel="stylesheet" href="./assets/css/style.css" />

        <script
            src="https://kit.fontawesome.com/1239ccb1ec.js"
            crossorigin="anonymous"
        ></script>
        <title>Pangaea</title>
    </head>
    <body>
        <!-- html files will be injected into the divs defined here-->
        <div id="navbar"></div>
        <div class="flex flex-col-reverse sm:flex-col">
            <div
                class="flex flex-col sm:flex-row sm:justify-end w-full sm:w-8/12 sm:mx-auto mt-3 p-6"
            >
                <button
                    class="rounded text-white bg-blue-500 py-2 px-4 text-xs font-bold"
                    onclick="saveArticle()"
                >
                    Publish
                </button>
            </div>
            <div class="mt-3 flex flex-col">
                <div
                    class="w-full sm:w-6/12 sm:mx-auto p-6 flex flex-col items-center"
                >
                    <div class="w-full mb-3">
                        <span
                            id="title_label"
                            class="text-xs font-bold text-gray-500 hidden"
                            >Title</span
                        >
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="font-serif text-lg w-full py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-200 rounded"
                            placeholder="Title"
                        />
                    </div>
                    <div class="w-full">
                        <span
                            id="subtitle_label"
                            class="text-xs font-bold text-gray-500 hidden"
                            >Subtitle</span
                        >
                        <input
                            type="text"
                            name="subtitle"
                            id="subtitle"
                            class="font-serif text-lg w-full py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-200 rounded"
                            placeholder="Subtitle"
                        />
                    </div>
                </div>
                <div
                    id="editorjs"
                    class="w-full shadow-sm border rounded sm:w-8/12 sm:mx-auto p-6 font-serif text-lg prose lg:prose-xl"
                ></div>
            </div>
        </div>
        <!-- JS file injections-->
        <script>
            let editor;
            $(function () {
                $("#title").change(function () {
                    if ($("#title").val() != "") {
                        $("#title_label").css("display", "block");
                    } else {
                        $("#title_label").css("display", "none");
                    }
                });
                $("#subtitle").change(function () {
                    if ($("#subtitle").val() !== "") {
                        $("#subtitle_label").css("display", "block");
                    } else {
                        $("#subtitle_label").css("display", "none");
                    }
                });
                $("#navbar").load("./components/navbar.php");

                editor = new EditorJS({
                    /**
                     * Id of Element that should contain the Editor
                     */
                    holder: "editorjs",

                    /**
                     * Available Tools list.
                     * Pass Tool's class or Settings object for each Tool you want to use
                     */
                    tools: {
                        header: Header,
                        delimiter: Delimiter,
                        paragraph: {
                            class: Paragraph,
                            inlineToolbar: true,
                            config: {
                                placeholder:
                                    "OK, write something binge-worthy...",
                            },
                        },
                        embed: Embed,
                        // image: SimpleImage,
                        image: {
                            class: ImageTool,
                            config: {
                                endpoints: {
                                    byFile: "http://localhost:8008/uploadFile", // Your backend file uploader endpoint
                                    byUrl: "http://localhost:8008/fetchUrl", // Your endpoint that provides uploading by Url
                                },
                            },
                        },
                    },
                    embed: Embed,
                    image: SimpleImage,
                    /**
                     * Previously saved data that should be rendered
                     */
                    data: {},
                });
            });
            function saveArticle() {
                editor
                    .save()
                    .then((output) => {
                        //getting json from the editor
                        console.log("data:" + output);
                    })
                    .catch((error) => {
                        console.log("error:" + error);
                    });
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/paragraph@latest"></script>
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script>
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script>
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script>
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@2.3.0"></script>
    </body>
</html>
