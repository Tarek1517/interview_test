$(document).ready(function () {
    $(".js-example-basic-multiple").select2();

    $(".js-example-basic-multiple").select2({
        placeholder: "Select categories", // Optional placeholder text
        width: "100%", // Ensures the dropdown fits the width of the container
    });

    // Adjust the styling after selection
    $(".js-example-basic-multiple").on("select2:select", function (e) {
        $(".select2-selection--single").css("height", "40px");
        $(".select2-selection__rendered").css({
            height: "30px",
            "line-height": "20px",
            display: "flex",
            "align-items": "center",
        });
    });

    // Apply initial styling for consistent display
    $(".select2-selection--single").css("height", "40px");
    $(".select2-selection__rendered").css({
        height: "30px",
        "line-height": "20px",
        display: "flex",
        "align-items": "center",
    });

    $(function () {
        $("#myFile").on("change", function (e) {
            const photoInp = $("#myFile");
            const [file] = this.files;
            if (file) {
                $("#imgpreview img").attr("src", URL.createObjectURL(file));
                $("#imgpreview").show();
            }
        });

        $("#gFile").on("change", function (e) {
            $(".gitems").remove();
            const gFile = $("gFile");
            const gphotos = this.files;
            $.each(gphotos, function (key, val) {
                $("#galUpload").prepend(
                    `<div class="item gitems"><img src="${URL.createObjectURL(
                        val
                    )}" alt=""></div>`
                );
            });
        });
    });

    $("#btn-Features").on("click", function () {
        var fieldIndex = new Date().getTime(); // Use a unique timestamp for unique IDs
        var inputDiv = `
    
            <span class="Feature-container">
    
                <div class="remove-btn d-md-flex justify-content-md-end mt-4">
                    <button type="button" class="btn btn-danger mb-2 "><i class="fa-solid fa-xmark"></i></button>
                </div>

                <!-- Features Description -->
                <div>
                        <div class="mb-2" style="font-size: 14px; font-weight: 700;">
                          Features Description <span class="text-red-500">*</span>
                        </div>
                        <textarea name="description[]" id="description[]"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-[12px] focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700 placeholder-gray-400"
                            placeholder="Features Description" required></textarea>
                    </div>

            </span>
        `;

        // Append the new input fieldset
        $("#moreFeatures").append(inputDiv);
    });

    $("#moreFeatures").on("click", ".remove-btn", function () {
        $(this).closest(".Feature-container").remove(); // Remove the entire feature container
    });
});
