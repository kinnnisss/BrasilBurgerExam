package sn.ism.brasilburger.service.impl;

import java.io.File;
import java.io.IOException;
import java.nio.file.Files;
import java.util.HashMap;
import java.util.Map;

import com.cloudinary.Cloudinary;

import sn.ism.brasilburger.service.IImageService;

public class ImageServiceImpl implements IImageService{

    private final Cloudinary cloudinary;

    public ImageServiceImpl() {

        String cloudinaryUrl = System.getenv("CLOUDINARY_URL");

        if (cloudinaryUrl == null || cloudinaryUrl.isBlank()) {
            System.err.println("CLOUDINARY_URL non défini : upload simulé (filename seulement).");
            this.cloudinary = null; 
        } else {
            this.cloudinary = new Cloudinary(cloudinaryUrl);
        }
    }

    @Override
    public byte[] readImageAsBytes(File file) throws IOException {
        return Files.readAllBytes(file.toPath());
    }

    @Override
    public void writeBytesToImage(byte[] data, File destination) throws IOException {
        Files.write(destination.toPath(), data);
    }

    @Override
    public String uploadAndGetUrl(File file) throws IOException {
        if (cloudinary == null) {
            return file.getName();
        }

        Map<String, Object> options = new HashMap<>();

        @SuppressWarnings("rawtypes")
        Map uploadResult = cloudinary.uploader().upload(file, options);

        Object secureUrl = uploadResult.get("secure_url");
        if (secureUrl != null) {
            return secureUrl.toString();
        }

        Object url = uploadResult.get("url");
        return url != null ? url.toString() : file.getName();
    }
    
}
