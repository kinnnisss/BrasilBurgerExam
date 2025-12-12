package sn.ism.brasilburger.service.impl;

import java.io.File;
import java.io.IOException;
import java.nio.file.Files;

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
        throw new UnsupportedOperationException("Unimplemented method 'writeBytesToImage'");
    }

    @Override
    public String uploadAndGetUrl(File file) throws IOException {
        throw new UnsupportedOperationException("Unimplemented method 'uploadAndGetUrl'");
    }
    
}
