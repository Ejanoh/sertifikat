<canvas id="pdf-canvas"></canvas>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

<script>
  const url = "<?= base_url('uploads/pdf/' . $file_name) ?>";
  let pdf = null,
    pageNum = 1,
    scale = 1.5,
    canvas = document.getElementById("pdf-canvas"),
    ctx = canvas.getContext('2d');

  pdfjsLib.getDocument(url).promise.then(function(pdfDoc) {
    pdf = pdfDoc;
    pdf.getPage(pageNum).then(function(page) {
      const viewport = page.getViewport({
        scale: scale
      });
      canvas.height = viewport.height;
      canvas.width = viewport.width;

      const renderContext = {
        canvasContext: ctx,
        viewport: viewport
      };
      page.render(renderContext);
    });
  });

  canvas.addEventListener("click", function(e) {
    const rect = canvas.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    if (confirm("Tambahkan tanda tangan di posisi ini?")) {
      fetch("<?= base_url('sertifikat/save_signature') ?>", {
          method: "POST",
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            file_name: "<?= $file_name ?>",
            x: x,
            y: y
          })
        })
        .then(res => res.text())
        .then(res => alert(res));
    }
  });
</script>