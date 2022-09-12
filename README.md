# admin-tool-framework
General Framework of an Admin-Tool UI I built from scratch.
The current directory layout would mimic a laravel/php application, and shows the various interconnected parts for the admin tool in the backend and frontend.
The tool is trimmed down and made generic to avoid leaking specific implementation features.
To view the tool, open the HTML file in the head directory in a browser (not functional without proper laravel application running and live database).

Code involves applying filters via dropdowns, choosing which keys to show via a pop-up selector (built with jquery-ui), sortable rows, and event listeners to modify data based on what filter/key is chosen.
