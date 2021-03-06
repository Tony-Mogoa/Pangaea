let editor;
let timeoutId;
let parser;

let isListOpen = false;
const ImageTool = window.ImageTool;
const articleId = $("#article-id").val();
$(function () {
    parser = new Parser();

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
                    placeholder: "OK, write something binge-worthy...",
                },
            },
            embed: {
                class: Embed,
                inlineToolbar: true,
            },
            // image: SimpleImage,
            image: {
                class: ImageTool,
                config: {
                    endpoints: {
                        byFile: "logic/procedures/uploadImage.php", //Your backend file uploader endpoint
                        byUrl: "http://localhost:8008/fetchUrl", // Your endpoint that provides uploading by Url
                    },
                },
            },
        },
    });
});

function saveArticle(elem) {
    const urlToAutoSaver = "logic/procedures/editArticle.php";

    switch (elem.attr("id")) {
        case "editorjs":
            editor
                .save() //getting json from the editor
                .then((output) => {
                    showLoader(true);
                    const featuredImg = parser.getFeaturedImg(output);
                    $.post(
                        urlToAutoSaver,
                        {
                            id: articleId,
                            body: output,
                            featuredImg: featuredImg ? featuredImg : "",
                        },
                        function (data) {
                            console.log(data);
                            showLoader(false);
                        }
                    );
                })
                .catch((error) => {
                    console.log("error:" + error);
                });
            break;
        case "title":
            showLoader(true);

            $.post(
                urlToAutoSaver,
                { id: articleId, title: elem.val() },
                function (data) {
                    showLoader(false);
                }
            );

            break;
        case "subtitle":
            showLoader(true);

            $.post(
                urlToAutoSaver,
                { id: articleId, subtitle: elem.val() },
                function (data) {
                    showLoader(false);
                }
            );

            break;
    }
}

function saveWholeArticle() {
    const urlToAutoSaver = "logic/procedures/editArticle.php";

    editor
        .save() //getting json from the editor
        .then((output) => {
            showLoader(true);
            const featuredImg = parser.getFeaturedImg(output);
            $.post(
                urlToAutoSaver,
                {
                    id: articleId,
                    body: output,
                    featuredImg: featuredImg ? featuredImg : "",
                },
                function (data) {
                    console.log(data);
                    showLoader(false);
                }
            );
        })
        .catch((error) => {
            console.log("error:" + error);
        });

    showLoader(true);

    $.post(
        urlToAutoSaver,
        { id: articleId, title: $("#title").val() },
        function (data) {
            showLoader(false);
        }
    );

    showLoader(true);

    $.post(
        urlToAutoSaver,
        { id: articleId, subtitle: $("#subtitle").val() },
        function (data) {
            showLoader(false);
        }
    );
}

function showLoader(visible) {
    if (visible) {
        $("#loaderContainer").removeClass("justify-end");
        $("#loaderContainer").addClass("justify-between");
        $("#loader").removeClass("hidden");
    } else {
        $("#loaderContainer").removeClass("justify-between");
        $("#loaderContainer").addClass("justify-end");
        $("#loader").addClass("hidden");
    }
}

function listenForChanges() {
    if (timeoutId) {
        clearTimeout(timeoutId);
    }

    timeoutId = setTimeout(() => {
        //save article to db after 1s inactivity
        saveArticle($(this));
    }, 1000);
}

function autosave() {
    $("#editorjs").on("keydown onmouseup", listenForChanges);
    $("#title").on("keydown onmouseup", listenForChanges);
    $("#subtitle").on("keydown onmouseup", listenForChanges);
}

autosave();

const modal = document.querySelector(".modal");
const trigger = document.querySelector(".trigger");
const closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    } else {
        closeSuggestionPopup();
    }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);

//Handle adding tags
const tagInput = $("#tag");
const tags = [];
tagInput.keydown(function (event) {
    if (event.keyCode == 13 && tagInput.val() != "") {
        const tagIndex = tags.length;
        addTag({ id: null, text: tagInput.val(), index: tagIndex });
        return false;
    }
});

function addTag(tag) {
    tags.push(tag);
    $("#tags").append(
        ` <span id="${tag.index}" class="rounded m-2 border p-2 text-gray-500 inline-flex items-center justify-between">
        <span class="text-xs mr-2">
        ${tag.text}
        </span>
        <span class="inline-flex justify-center items-center rounded-full hover:bg-gray-200">
            <button class="x-button inline-flex justify-center items-center focus:outline-none" onclick="removeTag(this)">&times;</button>
        </span>
    </span>`
    );
    tagInput.val("");
}

function removeTag(elem) {
    //get parent node
    const tagElem = elem.parentNode.parentNode;
    //hide the tag
    tagElem.classList.add("hidden");
    //get array index of tag
    const index = tagElem.getAttribute("id");
    //remove tag from array by assigning null
    tags[index] = null;
}

$("#go-live").click(function () {
    //Removing null elems from the array
    $("#publish-loader").removeClass("hidden");
    const finalTags = [];
    tags.forEach((element) => {
        if (element !== null) {
            finalTags.push(element);
        }
    });
    sendTags(finalTags);
});

function sendTags(finalTags) {
    saveWholeArticle();
    const articleId = $("#article-id").val();
    const url = "logic/procedures/publishArticle.php";
    $.post(
        url,
        { id: articleId, tags: JSON.stringify(finalTags) },
        function (data) {
            //check if publish was okay
            console.log(data);
            if (data == "OK") {
                routeTo("read", [{ id: articleId }]);
            }
        }
    );
}

/**
 *
 * @param {sectionName} dest e.g write, read
 * @param {array} params array of objects with query string params as key-value pairs
 */
function routeTo(dest, params) {
    let url = "read.php?";
    params.forEach((param, index) => {
        for (const [key, value] of Object.entries(param)) {
            url += `${key}=${value}`;
            //${index + 1 == params.length ? "" : "&"}`;
        }
        url += `${index + 1 == params.length ? "" : "&"}`;
    });
    document.location.href = url;
}
///on tag input change
$("input#tag").keyup(function () {
    if ($(this).val().trim().length != 0) {
        $.get(
            "logic/procedures/listTags.php",
            { tagInput: $(this).val().trim() },
            function (data) {
                $("#suggested-tags-list").empty();
                //has numberOfArticles
                const suggestions = JSON.parse(data);
                if (suggestions.length === 0) {
                    closeSuggestionPopup();
                } else {
                    showSuggestionPopup();
                }
                suggestions.forEach((tag) => {
                    $("#suggested-tags-list").append(`
                        <li class="px-2 py-3 hover:bg-indigo-500 hover:text-white w-full" id="${tag.id}">${tag.text}</li>
                    `);
                    $(`li#${tag.id}`).click(function () {
                        addSuggestedTag(tag);
                    });
                });
            }
        );
    } else {
        closeSuggestionPopup();
    }
});

$("input#tag").keydown(function () {
    if ($(this).val().trim().length == 0) {
        closeSuggestionPopup();
    }
});
function showSuggestionPopup() {
    $("#suggestions").removeClass("hidden");
    isListOpen = true;
}

function closeSuggestionPopup() {
    if (isListOpen) {
        $("#suggestions").addClass("hidden");
        isListOpen = false;
    }
}

function addSuggestedTag(tag) {
    const tagIndex = tags.length;
    addTag({ id: tag.id, text: tag.text, index: tagIndex });
    closeSuggestionPopup();
}
