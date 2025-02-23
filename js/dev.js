function setupSearch(roleid) {
    function loadDoc() {
        var xhr = new XMLHttpRequest();
        var searchQuery = document.getElementById("searchQuery").value;
        var userid = document.getElementById("userid").value;

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                try {
                    var results = JSON.parse(xhr.responseText);

                    var limitedResultsHTML = '<ul>';
                    results.forEach(result => {
                        var link = `../controller/dev-task-controller.php?action=view_task&task_id=${result.id}`;
                        limitedResultsHTML += `<li><a href="${link}">${result.formatted_name}</a></li>`;
                    });
                    limitedResultsHTML += '</ul>';

                    document.getElementById("searchResults").innerHTML = limitedResultsHTML;
                } catch (e) {
                    document.getElementById("searchResults").innerHTML = "<p>No results found.</p>";
                }
            }
        };

        xhr.open('GET', `../controller/dev-search-controller.php?query=${encodeURIComponent(searchQuery)}&roleid=${roleid}&userid=${userid}`, true);
        xhr.send();
    }

    document.getElementById('searchQuery').addEventListener('input', loadDoc);
}

document.addEventListener('DOMContentLoaded', function() {
    const roleid = 3;
    setupSearch(roleid);
});