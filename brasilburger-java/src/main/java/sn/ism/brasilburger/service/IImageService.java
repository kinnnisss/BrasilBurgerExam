package sn.ism.brasilburger.service;

import java.io.File;
import java.io.IOException;

public interface IImageService {

    
    byte[] readImageAsBytes(File file) throws IOException;
    void writeBytesToImage(byte[] data, File destination) throws IOException;
    String uploadAndGetUrl(File file) throws IOException;
}
