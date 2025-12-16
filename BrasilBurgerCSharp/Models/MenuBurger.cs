namespace BrasilBurgerCSharp.Models;

public class MenuBurger
{
    public int IdMenu { get; set; }
    public Menu? Menu { get; set; }

    public int IdBurger { get; set; }
    public Burger? Burger { get; set; }
}

