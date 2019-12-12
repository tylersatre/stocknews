# Tyler's Stock News and Recommendations Platform
> An easy conversion kit to turn WordPress into a stock news and analysis blog.

Installing this plugin and theme is an easy way to turn a fresh WordPress installation into a stock news and recommendations blog.  When writing a news or recommendation article, there is an additional field added to the new post types that allows you to input a stock ticker symbol.  This associates articles with a specific company, allowing readers to have easy access to the company's information page at the top of the article.  The company information page displays a profile, current market information, and links to all previous news and recommendation articles.  Stock recommendation articles will also display the company profile on the right hand side of the page.


## Requirements

* Fresh WordPress 5.3 Installation
    * May work on earlier versions of WordPress but is currently untested
* Ability to upload files to WordPress directory

## Installation

1. Download source code
2. Upload ~/plugins/stocknews to {WP_DIR}/wp-content/plugins
3. Upload ~/themes/stocknews to {WP_DIR}/wp-content/themes
4. Go to the WordPress Admin Dashboard and activate the "stocknews" theme and "Tyler's Stock News" plugin

## Usage example

There are two new post types added when this plugin is activated:

1. Stock News
2. Stock Recommendation

When posting either option, there will be an additional field on the right side, "Stock Symbol", where you input the ticker symbol for the company mentioned in the article.  This makes it so that company information is shown on the right side of the page for a recommendation, and provides a link at the top of both article types to the company profile page. ***NOTE*** There is currently no validation to confirm that a ticker symbol was provided or that it is valid, please make sure to double check this field when posting.

The home page will show the 10 most recent stock recommendation articles and allows the user to page through the rest 10 at a time.

## Release History

* 0.0.1
    * MVP Release

## Future Version Improvements

* Validation and error handling with stock symbols
    *  Currently stock symbols associated with news and recommendations are not validated.  Validation will be added on the field to confirm that it's 1-5 letters, and that it is an actual registered stock symbol.  Add section to posting screen that pulls company name after the author inputs the symbol, this will allow the author to more easily confirm that it is correct.
    *  There will be more error handling around the pulling of stock information from the external API. Currently the system only checks that the ticker symbol is 1-5 letters before trying to pull.  If data is not returned due to an incorrect symbol, pages will not render correctly.
* Customization Options
    * Allow user to set the number of posts displayed for paging on the main page and company profile pages.
    * Options to change the formatting and which information is displayed on company pages.
* Architecture
    * Streamline installation process.
    * Change the company market information and profile template parts to be widgets.
    * Fix function that pulls in company data from external API to pull via SSL.
    * Investigate using post categories or tags instead of creating custom post types.
    * Clean up extra unused files from underscores starter theme.
    * Investigate eliminating the need for a full theme replacement, and instead have custom display options to be used with any theme based off of post type (recommendations, news, company).
    

## Notes

* The theme was developed using [_s](https://underscores.me/)

## Meta

Tyler Satre – tyler.satre@gmail.com
[https://github.com/tylersatre/](https://github.com/tylersatre/)