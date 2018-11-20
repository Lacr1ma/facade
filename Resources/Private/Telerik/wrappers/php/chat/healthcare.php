<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<!-- Load Bot Framework Client API -->
<script src="https://unpkg.com/botframework-directlinejs/directLine.js"></script>

<!-- Load Adaptive Cards Client API -->
<script src="https://unpkg.com/adaptivecards/dist/adaptivecards.js"></script>

<?php
$chat = new \Kendo\UI\Chat('chat');
$chat->post('function(args) { agent.postMessage(args); }');
?>

<div class="demo-section k-content">
    <?php echo $chat->render(); ?>
</div>

<style>
    .k-card > img.k-card-image {
        height: 157px;
        display: block;
    }
</style>

<script>
    $(document).ready(function () {
        var chat = $("#chat").getKendoChat();
        window.agent = new DirectLineAgent(chat, "yFLWlpeK3CI.cwA.r18.M9VxoEcUnMthu5zsWX2Ox95r5YCcvbC_GvPJooRM0sQ");
    });

    var AdaptiveCardComponent = kendo.chat.Component.extend({
        init: function (options, view) {
            kendo.chat.Component.fn.init.call(this, options, view);

            var adaptiveCard = new AdaptiveCards.AdaptiveCard();

            adaptiveCard.hostConfig = new AdaptiveCards.HostConfig({
                fontFamily: "Segoe UI, Helvetica Neue, sans-serif"
            });

            adaptiveCard.parse(options);

            var bodyElement = $("<div>").addClass("k-card-body").append(adaptiveCard.render());
            this.element.addClass("k-card").append(bodyElement);
        }
    });

    kendo.chat.registerComponent("application/vnd.microsoft.card.adaptive", AdaptiveCardComponent);
</script>

<script>
    window.DirectLineAgent = kendo.Class.extend({
        init: function (chat, secret) {
            this.chat = chat;
            this.iconUrl = "https://demos.telerik.com/kendo-ui/content/chat/HealthCareBot.png";

            this.agent = new DirectLine.DirectLine({ secret: secret });

            this.agent.activity$.subscribe($.proxy(this.onResponse, this));
        },

        postMessage: function (args) {
            var postArgs = {
                text: args.text,
                type: args.type,
                timestamp: args.timestamp,
                from: args.from
            };

            this.agent.postActivity(postArgs)
                .subscribe();
        },

        onResponse: function (response) {
            if (response.from.id === this.chat.getUser().id) {
                return;
            }

            response.from.iconUrl = this.iconUrl;

            this.renderMessage(response);

            this.renderAttachments(response);

            this.renderSuggestedActions(response.suggestedActions);
        },

        renderMessage: function (message) {
            if (message.text || message.type == "typing") {
                this.chat.renderMessage(message, message.from);
            }
        },

        renderAttachments: function (data) {
            this.chat.renderAttachments(data, data.from);
        },

        renderSuggestedActions: function (suggestedActions) {
            var actions = [];

            if (suggestedActions && suggestedActions.actions) {
                actions = suggestedActions.actions;
            }

            this.chat.renderSuggestedActions(actions);
        }
    });
</script>

<?php require_once '../include/footer.php'; ?>