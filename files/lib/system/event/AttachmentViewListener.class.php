<?php
namespace wcf\system\event;

use wcf\system\WCF;

class AttachmentViewListener {
    public function execute($eventObj, $className, $eventName) {
        if ($eventObj->actionName !== 'view') return;
        if (WCF::getSession()->isCrawler()) return;

        $attachmentID = (int)($eventObj->attachmentID ?? 0);
        if (!$attachmentID) return;

        $sessionKey = 'viewedAttachment-' . $attachmentID;
        if (WCF::getSession()->getVar($sessionKey)) return;
        WCF::getSession()->register($sessionKey, true);

        $statement = WCF::getDB()->prepareStatement(
            "INSERT INTO wcf1_attachment_view (attachmentID, views)
             VALUES (?, 1)
             ON DUPLICATE KEY UPDATE views = views + 1"
        );
        $statement->execute([$attachmentID]);
    }
}
