<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Sustainable Living Guide</title>
    <link rel="stylesheet" href="styles2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <img src="logo.jpg" alt="Logo" height="60">
            </div>
            <h1>Gallery</h1>
            <nav>
                <ul class="d-flex">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="initiatives.html">Initiatives</a></li>
                    <li><a href="blogs.html">Blog</a></li>
                    <li><a href="events.html">Events</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="gallery py-5">
        <div class="container">
            <h2 class="text-center mb-5">Our Gallery</h2>

            <!-- Display the Latest 6 Images -->
            <div class="row mb-4" id="latestImages">
                <?php include 'fetch_images.php'; ?>
            </div>

            <!-- View More Button -->
            <div class="text-center mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#allImagesModal">
                    View More
                </button>
            </div>

            <!-- Modal to Display All Images -->
            <div class="modal fade" id="allImagesModal" tabindex="-1" aria-labelledby="allImagesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="allImagesModalLabel">All Images</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row" id="allImages">
                                    <?php include 'fetch_all_images.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Upload Form -->
            <form action="upload_image.php" method="post" enctype="multipart/form-data" class="mt-5">
                <h3>Upload Your Image</h3>
                <div class="mb-3">
                    <input type="file" class="form-control" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </section>

    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p>&copy; 2024 GreenHopeNetwork. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
