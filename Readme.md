# TYPO3 Extension "news_richteaser"

This extension is an enhancement to the TYPO3 news Extension.

It allows TYPO3 content elements in the news teaser.

## Warning

This extension is currently work in progress.

To work correctly a patch to the news extension is currently required (Resources/Private/Patches/news_teaser_partial.diff).

Alternatively you can clone the news extension from the Github repository (https://github.com/astehlik/typo3-extension-news) and checkout the teaserpatch branch which is based on the current master of the news extension and has the patch applied already. It will be updated from time to time.

## Install

Simply install the extension and include the "News rich teaser" in your TypoScript template.

In the new "Contents" tab you can now create content elements for the teaser and for the main content.
The teaser contents will only be used if no "normal" teaser is present.

