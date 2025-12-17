namespace BrasilBurgerCSharp.Service.Common;

public record ServiceResult<T>(bool Success, T? Data, ServiceError? Error, string? Message)
{
    public static ServiceResult<T> Ok(T data) => new(true, data, null, null);
    public static ServiceResult<T> Fail(ServiceError error, string message) => new(false, default, error, message);
}
