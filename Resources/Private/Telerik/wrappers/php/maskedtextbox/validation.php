<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$maskedtextbox = new \Kendo\UI\MaskedTextBox('PhoneNumber');

$maskedtextbox->mask('(999) 000-0000');
$maskedtextbox->attr('required', 'required');
$maskedtextbox->attr('data-validmask-msg', 'phone number is incomplete');
?>
<div class="demo-section k-content">
        <form id="employeeForm" data-role="validator" novalidate="novalidate">
            <ul id="fieldlist">
                <li>
                    <label for="FirstName">First Name:</label>
                    <input type="text" class="k-textbox" name="FirstName" id="FirstName" required="required" />
                </li>
                <li>
                    <label for="LastName">Last Name:</label>
                    <input type="text" class="k-textbox" name="LastName" id="LastName" required="required" />
                </li>
                <li>
                    <label for="PhoneNumber">Phone Number:</label>
                <?= $maskedtextbox->render(); ?>
                <span data-for='PhoneNumber' class='k-invalid-msg'></span>
                </li>
                <li class="actions">
                     <button type="button" data-role="button" data-icon="check" data-click='save'>Save</button>
                </li>
            </ul>
        </form>
</div>

<script type="text/javascript">
    $(function () {
        var container = $("#employeeForm");

        kendo.init(container);

        container.kendoValidator({
            rules: {
                validmask: function (input) {
                    if (input.is("[data-validmask-msg]") && input.val() != "") {
                        var maskedtextbox = input.data("kendoMaskedTextBox");
                        return maskedtextbox.value().indexOf(maskedtextbox.options.promptChar) === -1;
                    }

                    return true;
                }
            }
        });
    });

    function save(e) {
        var validator = $("#employeeForm").data("kendoValidator");
        if (validator.validate()) {
            alert("Employee Saved");
        }
    }

</script>

<style>

    #fieldlist {
        margin: 0 0 -2em;
        padding: 0;
    }

    #fieldlist li {
        list-style: none;
        padding-bottom: 2em;
    }

    #fieldlist label {
        display: block;
        padding-bottom: 1em;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 12px;
        color: #444;
    }

    #fieldlist input {
        width: 100%;
    }

    span.k-tooltip {
        margin-top: 5px;
        line-height: 1.7em;
        width: 100%;
        box-sizing: border-box;
        text-align: left;
    }

</style>
<?php require_once '../include/footer.php'; ?>
