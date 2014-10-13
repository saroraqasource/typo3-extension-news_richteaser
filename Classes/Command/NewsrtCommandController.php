<?php
namespace Int\NewsRichteaser\Command;

/*                                                                        *
 * This script belongs to the TYPO3 Extension "news_richteaser".          *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Controller for richteaser news related commands.
 */
class NewsrtCommandController extends \TYPO3\CMS\Extbase\Mvc\Controller\CommandController {

	/**
	 * @var \Int\NewsRichteaser\Domain\Repository\NewsRichteaserRepository
	 * @inject
	 */
	protected $newsRepository;

	/**
	 * Update inline content elemens
	 *
	 * Converts the inline content elements from a m:m to a 1:n relation
	 */
	public function updateInlineContentsCommand() {

		$inlineTeaserContents = $this->newsRepository->findInlineContentsMmTeaser();
		$counter = 0;
		foreach ($inlineTeaserContents as $inlineTeaserContentMm) {
			$this->newsRepository->updateInlineContentRelation('teaser_content_elements', $inlineTeaserContentMm['uid_local'], $inlineTeaserContentMm['uid_foreign'], $inlineTeaserContentMm['sorting']);
			$counter++;
		}
		$this->outputLine('Updated %d teaser content elements.', array($counter));

		$counter = 0;
		$inlineContents = $this->newsRepository->findInlineContentsMm();
		foreach ($inlineContents as $inlineContentMm) {
			$this->newsRepository->updateInlineContentRelation('content_elements', $inlineContentMm['uid_local'], $inlineContentMm['uid_foreign'], $inlineContentMm['sorting']);
			$counter++;
		}
		$this->outputLine('Updated %d content elements.', array($counter));
	}
}