<?php $__env->startSection("title", "PanamaApi Documentation"); ?>
<?php $__env->startSection("section-title", "Panama API - Interactive Documentation"); ?>
<?php $__env->startSection("content"); ?> 

<link rel="stylesheet"  href="<?php echo e(asset('css/documentation.css')); ?>">
<div class="container mt-4">
    <div class="row">
        <!-- Sidebar para navegación -->
        <aside class="col-md-3">
            <nav class="nav flex-column">
                <h5 class="text-primary mb-3">Endpoints</h5>
                <a class="nav-link" href="#districts">Districts</a>
                <a class="nav-link" href="#district-by-id">District by ID</a>
                <a class="nav-link" href="#provinces">Provinces</a>
                <a class="nav-link" href="#province-by-id">Province by ID</a>
                <a class="nav-link" href="#corregimientos">Corregimientos</a>
                <a class="nav-link" href="#corregimiento-by-id">Corregimiento by ID</a>
            </nav>
        </aside>
        <!-- Contenido principal -->
        <main class="col-md-9">
            <h2 class="mb-4">Panama API Documentation</h2>
            <p>Welcome to the interactive documentation for the Panama API. Below, you'll find detailed descriptions of each endpoint, how to consume them, and sample JSON responses.</p>

            <!-- Endpoint: Districts -->
            <section id="districts" class="mb-5">
                <h4 class="text-secondary">1. Get All Districts</h4>
                <p>This endpoint retrieves a list of all districts available in Panama.</p>
                <code>GET <?php echo e($endpoints['districts']); ?></code>
                <div class="response-box mt-3 scroll-container">
                    <h6 class="text-muted">Sample Response</h6>
                    <pre class="bg-dark text-white p-3 rounded"><code id="districts-response" class="hljs language-json">// Loading...</code></pre>

                </div>
            </section>

            <!-- Endpoint: District by ID -->
            <section id="district-by-id" class="mb-5">
                <h4 class="text-secondary">2. Get District by ID</h4>
                <p>Retrieve information for a specific district by its ID.</p>
                <code>GET <?php echo e($endpoints['district_by_id']); ?></code>
                <div class="response-box mt-3 scroll-container">
                    <h6 class="text-muted">Sample Response</h6>
                    <pre class="bg-dark text-white p-3 rounded"><code id="district-by-id-response">// Loading...</code></pre>
                </div>
            </section>

            <!-- Endpoint: Provinces -->
            <section id="provinces" class="mb-5">
                <h4 class="text-secondary">3. Get All Provinces</h4>
                <p>Fetch a complete list of all provinces in Panama.</p>
                <code>GET <?php echo e($endpoints['provinces']); ?></code>
                <div class="response-box mt-3 scroll-container">
                    <h6 class="text-muted">Sample Response</h6>
                    <pre class="bg-dark text-white p-3 rounded"><code id="provinces-response">// Loading...</code></pre>
                </div>
            </section>

            <!-- Endpoint: Province by ID -->
            <section id="province-by-id" class="mb-5">
                <h4 class="text-secondary">4. Get Province by ID</h4>
                <p>Retrieve details for a specific province using its ID.</p>
                <code>GET <?php echo e($endpoints['province_by_id']); ?></code>
                <div class="response-box mt-3 scroll-container">
                    <h6 class="text-muted">Sample Response</h6>
                    <pre class="bg-dark text-white p-3 rounded"><code id="province-by-id-response">// Loading...</code></pre>
                </div>
            </section>

            <!-- Endpoint: Corregimientos -->
            <section id="corregimientos" class="mb-5">
                <h4 class="text-secondary">5. Get All Corregimientos</h4>
                <p>Get a list of all corregimientos available in Panama.</p>
                <code>GET <?php echo e($endpoints['corregimientos']); ?></code>
                <div class="response-box mt-3 scroll-container">
                    <h6 class="text-muted">Sample Response</h6>
                    <pre class="bg-dark text-white p-3 rounded"><code id="corregimientos-response">// Loading...</code></pre>
                </div>
            </section>

            <!-- Endpoint: Corregimiento by ID -->
            <section id="corregimiento-by-id" class="mb-5">
                <h4 class="text-secondary">6. Get Corregimiento by ID</h4>
                <p>Retrieve details for a specific corregimiento using its ID.</p>
                <code>GET <?php echo e($endpoints['corregimiento_by_id']); ?></code>
                <div class="response-box mt-3 scroll-container">
                    <h6 class="text-muted">Sample Response</h6>
                    <pre class="bg-dark text-white p-3 rounded"><code id="corregimiento-by-id-response">// Loading...</code></pre>
                </div>
            </section>
        </main>
    </div>
</div>
<script>
   document.addEventListener("DOMContentLoaded", () => {
    const endpoints = <?php echo json_encode($endpoints, 15, 512) ?>;
    const sections = {
        districts: "districts-response",
        district_by_id: "district-by-id-response",
        provinces: "provinces-response",
        province_by_id: "province-by-id-response",
        corregimientos: "corregimientos-response",
        corregimiento_by_id: "corregimiento-by-id-response",
    };

    // Recorrer los endpoints y obtener los datos
    for (const [key, url] of Object.entries(endpoints)) {
        fetch(url)
            .then(response => response.json())
            .then(data => {
                const sectionId = sections[key];
                const codeElement = document.getElementById(sectionId);

                if (codeElement) {
                    // Usa syntaxHighlight para resaltar el JSON
                    codeElement.innerHTML = syntaxHighlight(data);
                }
            })
            .catch(error => {
                console.error(`Error fetching data from ${url}:`, error);
                const codeElement = document.getElementById(sections[key]);
                if (codeElement) {
                    codeElement.textContent = "// Error loading data";
                }
            });
    }
});

function syntaxHighlight(json) {
    if (typeof json !== 'string') {
        json = JSON.stringify(json, undefined, 2);
    }
    json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    return json.replace(/("(\\u[\da-fA-F]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(\.\d+)?([eE][+-]?\d+)?)/g, function (match) {
        let cls = 'number';
        if (/^"/.test(match)) {
            if (/:$/.test(match)) {
                cls = 'key'; // Clave del JSON
            } else {
                cls = 'string'; // Valor tipo string
            }
        } else if (/true|false/.test(match)) {
            cls = 'boolean'; // Booleano
        } else if (/null/.test(match)) {
            cls = 'null'; // Null
        }
        return `<span class="${cls}">${match}</span>`;
    });
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("template.sectiontemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u426645434/domains/escueladeprogramacion.net/public_html/grupos/grupo1/resources/views/pages/api/documentation/index.blade.php ENDPATH**/ ?>