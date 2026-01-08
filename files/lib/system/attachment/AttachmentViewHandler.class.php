<?php
namespace wcf\system\attachment;

use wcf\system\WCF;

class AttachmentViewHandler {
    public static function getViews(int $attachmentID): int {
        $statement = WCF::getDB()->prepareStatement(
            "SELECT views FROM wcf1_attachment_view WHERE attachmentID = ?"
        );
        $statement->execute([$attachmentID]);
        return (int)($statement->fetchSingleColumn() ?? 0);
    }
}
