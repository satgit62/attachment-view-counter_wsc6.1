{php}
use wcf\system\attachment\AttachmentViewHandler;
$views = AttachmentViewHandler::getViews($attachmentID);
{/php}

{if $views > 0}
<span class="attachmentViews">
    <fa-icon name="eye" /> {$views}
</span>
{/if}
