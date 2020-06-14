var editor_config = {
    path_absolute: "/",
    selector: "textarea#editor",
    height: 300,
    plugins: [
        "advlist autolink lists link image hr",
        "searchreplace wordcount code",
        "insertdatetime media save table contextmenu directionality",
        "textcolor colorpicker"
    ],
    menu: {
        edit: { title: "Edit", items: "undo redo | selectall | searchreplace" },
        insert: {
            title: "Insert",
            items: "image link media inserttable | hr | insertdatetime"
        },
        format: {
            title: "Format",
            items:
                "bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align | forecolor backcolor | removeformat"
        },
        tools: {
            title: "Tools",
            items: "code"
        },
        table: {
            title: "Table",
            items: "inserttable | cell row column | tableprops deletetable"
        }
    },
    menubar: "edit insert format tools table",
    toolbar:
        "undo redo | bold underline italic strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | forecolor  removeformat | link image media | ltr rtl",
    directionality: "rtl",
    image_advtab: true,
    content_css: [
        "//fonts.googleapis.com/css?family=Lato:300,300i,400,400i",
        "//www.tiny.cloud/css/codepen.min.css"
    ],
    image_class_list: [
        { title: "Must Define Class", value: "" },
        { title: "Some class", value: "class-name" }
    ],
    relative_urls: false,
    file_browser_callback: function (field_name, url, type, win) {
        var x =
            window.innerWidth ||
            document.documentElement.clientWidth ||
            document.getElementsByTagName("body")[0].clientWidth;
        var y =
            window.innerHeight ||
            document.documentElement.clientHeight ||
            document.getElementsByTagName("body")[0].clientHeight;

        var cmsURL =
            editor_config.path_absolute +
            "laravel-filemanager?field_name=" +
            field_name;
        if (type == "image") {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
            file: cmsURL,
            title: "Filemanager",
            width: x * 0.8,
            height: y * 0.8,
            resizable: "yes",
            close_previous: "no"
        });
    }
};

tinymce.init(editor_config);
