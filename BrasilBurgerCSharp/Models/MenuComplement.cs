namespace BrasilBurgerCSharp.Models;
public class MenuComplement
{
    public int IdMenu { get; set; }
    public Menu? Menu { get; set; }

    public int IdComplement { get; set; }
    public Complement? Complement { get; set; }
}
